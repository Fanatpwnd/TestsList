<?php
namespace Main\TestsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="questions")
 */

class Question {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Test", inversedBy="questions")
     * @ORM\JoinColumn(name="test_id", referencedColumnName="id")
     */
    protected $test_id;

    /**
     * @ORM\Column(type="string", length=7)
     */

     protected $type;

     /**
      * @ORM\Column(type="text")
      */

    protected $text;

    /**
     * @ORM\Column(type="text")
     */

    protected $answers;

    /**
     * @ORM\Column(type="string", length=255)
     */

    protected $correct;


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
     * Set type
     *
     * @param string $type
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set answers
     *
     * @param string $answers
     * @return Question
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return string 
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set correct
     *
     * @param string $correct
     * @return Question
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return string 
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Set test_id
     *
     * @param \Main\TestsBundle\Entity\Test $testId
     * @return Question
     */
    public function setTestId(\Main\TestsBundle\Entity\Test $testId = null)
    {
        $this->test_id = $testId;

        return $this;
    }

    /**
     * Get test_id
     *
     * @return \Main\TestsBundle\Entity\Test 
     */
    public function getTestId()
    {
        return $this->test_id;
    }
}
