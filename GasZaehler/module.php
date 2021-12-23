<?php
class EseraGaszaehler extends IPSModule 
{
    public function Create()
	{
        //Never delete this line!
        parent::Create();
        //These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.
        $this->RegisterPropertyInteger("CounterID", 0);
        $this->RegisterPropertyInteger("Impulses", 1000);
        $this->RegisterPropertyInteger("AnnualLimit", 1000);
        $this->RegisterPropertyInteger("LimitActive", 100);
		
		$this->RegisterVariableInteger("Counter", "Counter", "", 1);
		
		$this->RegisterTimer("Refresh", 0, 'ESERA_RefreshCounter($_IPS[\'TARGET\']);'); 
		$this->DebugMessage("Counter", "CounterOld: " . 'ESERA_RefreshCounter($_IPS[\'TARGET\']);');

	}
	
    public function Destroy()
	{
        //Never delete this line!
        parent::Destroy();
    }
	
    public function ApplyChanges()
	{
        //Never delete this line!
        parent::ApplyChanges();
        //$this->SetTimerInterval("Refresh", 180 * 1000);
        //$this->SetDailyTimerInterval();
        //$this->SetMonthlyTimerInterval();
        //$this->SetYearlyTimerInterval();    
    }

	public function ReceiveData($JSONString) 
	{
        // not implemented   
    }
	
	public function RefreshCounter()
	{
       $this->calculate();   
    }
	
	private function Calculate()
	{
		$CounterOld = GetValue($this->GetIDForIdent("Counter"));
		$CounterNew = GetValue($this->ReadPropertyInteger("CounterID"));
		
		$this->DebugMessage("Counter", "CounterOld: " . $CounterOld);
        	$this->DebugMessage("Counter", "CounterNew: " . $CounterNew);
	}
	
	private function DebugMessage($Sender, $Message)
	{
        $this->SendDebug($Sender, $Message, 0);
    }
}
?>
