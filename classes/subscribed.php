<?php
class Applicant_SubscribedToLists extends Pet
{
    private $_selectionsJobs = array();

    private $_selectionsVerticals = array();

    public function setSelectionsJobs($selectionsJobs)
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    public function getSelectionsJobs()
    {
       return $this->_selectionsJobs;
    }

    public function setSelectionsVerticals($selectionsVerticals)
    {
        $this->_selectionsJobs = $selectionsVerticals;
    }

    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }
}