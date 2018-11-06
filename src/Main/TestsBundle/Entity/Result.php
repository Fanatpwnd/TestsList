<?php
namespace Main\TestsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="results")
 */

class Result {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\Column(type="string", length=16)
    */

    protected $ip;

    /**
     * @ORM\Column(type="datetime")
     */

    protected $date;

    /**
     * @ORM\Column(type="string", length=255)
     */

    protected $test_name;

     /**
      * @ORM\OneToMany(targetEntity="Answer", mappedBy="result")
      */

    protected $answers;

    public function __construct(){
        $this->answers = new ArrayCollection();
        $this->date = new \DateTime(); 
    }

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
     * Set ip
     *
     * @param string $ip
     * @return Result
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Result
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set test_name
     *
     * @param string $testName
     * @return Result
     */
    public function setTestName($testName)
    {
        $this->test_name = $testName;

        return $this;
    }

    /**
     * Get test_name
     *
     * @return string 
     */
    public function getTestName()
    {
        return $this->test_name;
    }

    /**
     * Add answers
     *
     * @param \Main\TestsBundle\Entity\Answer $answers
     * @return Result
     */
    public function addAnswer(\Main\TestsBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Main\TestsBundle\Entity\Answer $answers
     */
    public function removeAnswer(\Main\TestsBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
