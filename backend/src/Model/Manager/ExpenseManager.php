<?php

namespace App\Model\Manager;

use App\Model\Entity\Expense;

class ExpenseManager extends BaseManager
{
    public function newExpense(): Expense
    {
        $entityBody = json_decode(file_get_contents('php://input'), true);
        $newExpanse = 'INSERT INTO Expense (id, name, paying_one_id, flatshare_id, sum, category_id, date_created )
                        VALUES (:id, :name, :paying_one_id, :flatshare_id, :sum, :category_id, :date_created)';
        $query = $this->pdo->prepare($newExpanse);
        $query-> bindValue(':id', $entityBody->getId());
        $query-> bindValue(':name', $entityBody->getName());
        $query-> bindValue(':paying_one_id', $entityBody->getPayingOneId());
        $query-> bindValue(':flatshare_id', $entityBody->getFlatshareId());
        $query-> bindValue(':sum', $entityBody->getSum());
        $query-> bindValue(':category_id', $entityBody->getCategoryId());
        $query-> bindValue(':date_created', $entityBody->getDateCreated());
        $query->execute();

        return new Expense($entityBody);

    }

    public function deleteExpense(string $id): void
    {
        $deleteExpense = 'DELETE FROM Expense WHERE id= :id';
        $query = $this->pdo->prepare($deleteExpense);
        $query->bindValue(':id', $id);
        $query->execute();
    }

    public function getAll(): array
    {
        $getAll = 'SELECT * FROM Expense';
        $query = $this->pdo->prepare($getAll);
        $expense = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $expense[] = new Expense($data);
        }
        return $expense;

    }

    public function getOne(string $id): ?Expense {
        $query = $this->pdo->prepare('SELECT * FROM Expense WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data ? new Expense($data) : null;
    }

    public function updateExpense(): Expense {
        $entityBody = json_decode(file_get_contents('php://input'), true);
        $query = $this->pdo->prepare(<<<EOT
            UPDATE Expense 
            SET name = :name, paying_one_id = :paying_one_id, date_created = :date_created, sum = :sum, category_id = :category_id
            WHERE id = :id
        EOT);
        $query->bindValue(':name', $entityBody->getName());
        $query->bindValue(':paying_one_id', $entityBody->getPayingOneId());
        $query->bindValue(':date_created', $entityBody->getDateCreated());
        $query->bindValue(':sum', $entityBody->getSum());
        $query->bindValue(':category_id', $entityBody->getCategoryId());
        $query->execute();

        return new Expense($entityBody);

    }