<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class TabouPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class TabouPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        // INIT
        //Start with scissors as first move
        $nb_round = $this->result->getNbRound();
        // get opponent last choice
        $opp_last_choice = $this->result->getLastChoiceFor($this->opponentSide);
        // get opponent last result
        $opp_last_score = $this->result->getChoicesFor($this->opponentSide);
        // get my choices
        $my_choices = $this->result->getChoicesFor($this->mySide);
        // get my last choice
        $my_choice_size = sizeof($my_choices);

        // First move
        if ($nb_round === 0) {
            //Betting on the fact that people will mostly start with rock to counter the default scissors
            $choice = parent::paperChoice();
        }
        /*else {
            //Betting on the fact that people will try to counter my last move (unlikely at 20:34)
            $my_last_choice = $my_choices[$my_choice_size - 1];
            if ($my_last_choice === 'paper') {
                $choice = parent::rockChoice();
            }
            elseif ($my_last_choice === 'rock') {
                $choice = parent::scissorsChoice();
            }
            else {
                $choice = parent::paperChoice();
            }  
        }*/
        else {
            //simple counter on people last move
            if ($opp_last_choice === 'paper') {
                $choice = parent::scissorsChoice();
            }
            elseif ($opp_last_choice === 'rock') {
                $choice = parent::paperChoice();
            }
            else {
                $choice = parent::rockChoice();
            }
        }

        return $choice;
        /*// If opponent succeed, it is most likely to continue with the same choice
        if ($opp_last_score === 5 or $opp_last_score === 1) {
            
        }*/
    }
};