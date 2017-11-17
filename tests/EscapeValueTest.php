<?php

/**
 * Class EscapeValueTest
 */
class EscapeValueTest extends TestCase 
{
    /** @test */
    public function escape_value_for_an_input_field() 
    {
        $this->assertBladeRender('name="name" value="&lt;"', "@input('name', '<')"); 
    }

    /** @test */
    public function escape_value_for_a_textarea()
    {
        $this->assertBladeRender('&lt;html&gt;', "@text('name', '<html>')");
    }

    /** @test */
    public function escape_value_for_a_checkbox()
    {
        $this->assertBladeRender('name="name" value="&lt;"', "@checkbox('name', '<')");
    }

    /** @test */
    public function escape_value_for_a_radio_button()
    {
        $this->assertBladeRender('name="name" value="&lt;"', "@radio('name', '<')");
    }

    /** @test */
    public function escape_value_for_an_option()
    {
        $this->assertBladeRender('<option value="&lt;">Text</option>', '@options($options, "name")', [
            'options' => ['<' => 'Text']
        ]);
    }
}