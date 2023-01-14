<?php

namespace App\Model\Manager;

use App\Model\Entity\User;

class UserManager extends BaseManager
{
    public function getAll(): array {
        $query = $this->pdo->query('SELECT * FROM Users');
        $users = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }
        return $users;
    }

    public function getOne(string $id): ?User {
        $query = $this->pdo->prepare('SELECT * FROM Users WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data ? new User($data) : null;
    }

    public function getByEmail(string $email): ?User {
        $query = $this->pdo->prepare('SELECT * FROM Users WHERE email = :email');
        $query->bindValue(':email', $email, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data ? new User($data) : null;
    }

    public function postOne(): User
    {
        $body = json_decode(file_get_contents('php://input'), true);
        $uniqueId = uniqid('user_');

        $query = $this->pdo->prepare(<<<EOT
            INSERT INTO Users (id, firstname, lastname, email, password)
            VALUES (:id, :firstname, :lastname, :email, :password)
        EOT);
        $query->bindValue(':id', $uniqueId, \PDO::PARAM_STR);
        $query->bindValue(':firstname', $body['firstname'], \PDO::PARAM_STR);
        $query->bindValue(':lastname', $body['lastname'], \PDO::PARAM_STR);
        $query->bindValue(':email', $body['email'], \PDO::PARAM_STR);
        $query->bindValue(':password', password_hash($body['password'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
        $query->execute();

        return $this->getOne($uniqueId);
    }

    public function putOne(): User
    {
        $body = json_decode(file_get_contents('php://input'), true);
        $user = new User($body);

        $query = $this->pdo->prepare(<<<EOT
            UPDATE Users 
            SET firstname = :firstname,
                lastname = :lastname,
                email = :email,
                phone = :phone,
                profile_picture = :profile_picture,
                password = :password,
                date_created = :date_created
            WHERE id = :id
        EOT);

        return $this->extracted($query, $user);
    }

    /**
     * @param bool|\PDOStatement $query
     * @param User $user
     * @return User
     */
    public function extracted(bool|\PDOStatement $query, User $user): User
    {
        $query->bindValue(':id', $user->getId(), \PDO::PARAM_STR);
        $query->bindValue(':firstname', $user->getFirstname(), \PDO::PARAM_STR);
        $query->bindValue(':lastname', $user->getLastname(), \PDO::PARAM_STR);
        $query->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
        $query->bindValue(':phone', $user->getPhone(), \PDO::PARAM_STR);
        $query->bindValue(':profile_picture', $user->getProfilePicture(), \PDO::PARAM_STR);
        $query->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue(':date_created', $user->getDateCreated(), \PDO::PARAM_STR);
        $query->execute();

        return $this->getOne($user->getId());
    }
}