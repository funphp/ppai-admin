<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class eventsController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
*/

			$this->filter = \DataFilter::source(new \App\Events);
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', 'Name')->link('/panel/settings/edit/{{ $row->id }}');
			$this->addStylesToGrid();

        
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	 */
			$this->edit = \DataEdit::source(new \App\Events());

			$this->edit->label('Edit Events');

			$this->edit->add('name', 'Name', 'text');
			$this->edit->add('prive', 'Price', 'text');
			$this->edit->add('year', 'Year', 'date')->format('Y', 'en');
			$this->edit->add('start_date', 'Start Date', 'date')->format('d/m/Y', 'en');
			$this->edit->add('end_date', 'End Date', 'date')->format('d/m/Y', 'en');
			

        return $this->returnEditView();
    }    
}
