<?php 

use ActivismeBE\FormHelper\Form;
use Illuminate\Database\Eloquent\Model; 

class ValueTest extends TestCase 
{
    public function test_value_method_returns_session_empty_values() 
    {
        $form = app('Activisme_BE'); 
        session()->flashInput(['field' => '']); 

        $this->assertEquals('', $form->value('field'));
    }

    public function test_value_method_returns_model_empty_values() 
    {
        $model = $this->prophesize(Model::class); 
        $model->getAttribute('field')->willReturn(''); 

        $form = app('Activisme_BE'); 
        $form->model($model->reveal()); 

        $this->assertEquals('', $form->value('field'));
    }

    public function test_value_method_returns_default_value() 
    {
        $form = app('Activisme_BE'); 
        $this->assertEquals('default', $form->value('field', 'default'));
    }
}