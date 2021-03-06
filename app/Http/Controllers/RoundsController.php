<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Rounds;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class roundsController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
*/

			$this->filter = \DataFilter::source(new Rounds());
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', 'Name');
			$this->addStylesToGrid();

        
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	 */
			$this->edit = \DataEdit::source(new Rounds());

			$this->edit->label('Edit Round');

			$this->edit->add('name', 'Name', 'text');

        return $this->returnEditView();
    }    
}
