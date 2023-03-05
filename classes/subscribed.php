<?php
class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionsJobs;

    private $_selectionsVerticals;

    function __construct($job="", $vertical="")
    {
        $this->_selectionsJobs = $job;
        $this->_selectionsVerticals = $vertical;

    }
    public function setSelectionsJobs($job)
    {
        $this->_selectionsJobs = $job;
    }

    public function getSelectionsJobs()
    {
       return $this->_selectionsJobs;
    }

    public function setSelectionsVerticals($vertical)
    {
        $this->_selectionsJobs = $vertical;
    }

    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }
}