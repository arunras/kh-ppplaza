<?php
ob_start();
if(!isset($_SESSION))session_start();
    /*
    * This class is used to design and access to database for tbl_performer
    * Creator: Rith Phearun
    * Date Created: Oct-01-2011
    */
class category{
	private $category_id;
    private $category_name;
	
	
    public function __construct($id = ""){
            $this->category_id = $id;
			$this->category_name = "";
    }
	
	private function getLanguageId(){
		if($_SESSION['language_selected']=="en"){return 1;}
		elseif($_SESSION['language_selected']=="kh"){return 2;}
    }
	
    private function initDb(){
    	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/module/module.php");
    }
/*==GET from DB=============================================================================================================*/
	//get Category Name
	public function getCategoryName(){
		$this->initDb();
		if($this->category_id !=0){
			$this->category_name = getResultSet("SET NAMES UTF8");
			$this->category_name = getValue("SELECT name FROM ".DB_PREFIX."category_description WHERE category_id=".$this->category_id." AND language_id =".$this->getLanguageId());
		}
		return $this->category_name;//."lag= ".$this->getLanguageId();	
	}
	//get List Category Icon
	public function getListCategoryIcon(){
		$this->initDb();
		if($this->category_id !=0){
			$this->category_icon = getValue("SELECT image FROM ".DB_PREFIX."category WHERE category_id=".$this->category_id);
		}
		return 'store/image/'.$this->category_icon;	
	}
/*==END GET from DB=============================================================================================================*/
/*==END DISPLAY=============================================================================================================*/

/*==END Display=============================================================================================================*/

                    
                    
                        
                            
                            
                           
                            
                                
                            
                        
                    
                
            
	
}
?>