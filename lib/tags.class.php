<?php 	

class Tags {

	private $Tags;
	

	public function __construct($Tags)
	{
		$this->Tags = $Tags;
		
	}

	public function have_User($UserList)
	{

		foreach($this->Tags as $tag => $tagval)	
		{
			//echo $tagval."--";

			foreach($UserList as $user)
			{
				if($tagval == $user['user'])
				
				{
					unset($this->Tags[$tag]);
					$this->Tags;
				}

			}
			
		}


	}

	public function tag($UserList)
	{
		$this->have_User($UserList);
		return $this->Tags;
	}


}








 ?>