<?php
namespace Main\TestsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answers")
 */

class Answer {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Result", inversedBy="answers")
     * @ORM\JoinColumn(name="result_id", referencedColumnName="id")
     */
    protected $id_result;

    /**
     * @ORM\Column(type="integer")
    */

    protected $question_id; //question_id TODO

    /**
     * @ORM\Column(type="text")
     */

    protected $answer;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set answer
     *
     * @param string $answer
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set id_result
     *
     * @param \Main\TestsBundle\Entity\Result $idResult
     * @return Answer
     */
    public function setIdResult(\Main\TestsBundle\Entity\Result $idResult = null)
    {
        $this->id_result = $idResult;

        return $this;
    }

    /**
     * Get id_result
     *
     * @return \Main\TestsBundle\Entity\Result 
     */
    public function getIdResult()
    {
        return $this->id_result;
    }

    /**
     * Set question_id
     *
     * @param integer $questionId
     * @return Answer
     */
    public function setQuestionId($questionId)
    {
        $this->question_id = $questionId;

        return $this;
    }

    /**
     * Get question_id
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }
}
