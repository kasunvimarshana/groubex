<?php

interface DBDal{
	
	public function f_save($obj);
    public function f_update($obj);
    public function f_delete($id);
    public function f_search($id);
    public function f_list();
	
}

?>