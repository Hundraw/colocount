<?php

// fonction ajout d'une dépense (modifier en fonction de ExpenseController et ExpenseManager)
// remplacer les valeurs par les

public function newExpense() {
    $sumNewExpense = '' ;
    $nbParticipants = 5 ;

    $duePerParticipants = -1 * floor(100 * $sumNewExpense % $nbParticipants)%100 ;
    $dueLastParticipant = -1 * ($sumNewExpense - ($duePerParticipants * ($nbParticipants - 1))) ;
    return $duePerParticipants && $dueLastParticipant;
}

//création d'un tableau pour le remboursement (user -> somme due)
//
public function payBack() {
    $participants = array(user1 => $dueId1, user2 => $dueId2, user3 => $dueId3, user4 => $dueId4); //en fonction du nb de membre dans la colloc
    $paybackEnd = count($participants, COUNT_NORMAL);
    $owes = []; //tableau final pour savoir  qui doit quoi a qui

    while($paybackEnd != 0) {
        asort($participants);
        $absoluteValue = $participants[0];
        $paybackValue = min(abs($absoluteValue),$participants[-1]);
        $participants[0] -= $paybackValue;
        $participants[-1] -= $paybackValue;
        $owes[] = array("sender" => key($participants[0]),
            "receiver" => key($participants[-1]),
            "value" => $paybackValue);
        if ($participants[0] === 0){
            unset($participants[0]);
        }
        if ($participants[-1] === 0){
            unset($participants[-1]);
        }
        $paybackEnd = count($participants);
        }
}

?>
