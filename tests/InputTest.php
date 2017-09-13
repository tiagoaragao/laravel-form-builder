<?php

require_once 'FormBuilderTestBase.php';

class InputTest extends FormBuilderTestBase
{
    public function testOpening()
    {
        $message = 'Some issue with input';

        $input = $this->formBuilder->input('testName');
        $this->assertContains('<input', $input, $message);
        $this->assertContains('name="testName"', $input, $message);
    }

    public function testErrors()
    {
        $message = 'Some issue with validation errors in input';

        $input = $this->formBuilder->input('testName', 'Test label', ['error' => 'Test error message']);
        $this->assertContains('Test error message', $input, $message);

        $this->setError('testName', 'Test error message');

        $input = $this->formBuilder->input('testName', 'Test label');
        $this->assertContains('Test error message', $input, $message);

        $input = $this->formBuilder->input('testName', 'Test label', ['error' => false]);
        $this->assertNotContains('Test error message', $input, $message);

        $this->setError('testName', 'Test error message 2');
        $input = $this->formBuilder->input('testName', 'Test label');
        $this->assertNotContains('Test error message 2', $input, $message);

        $input = $this->formBuilder->input('testName', 'Test label', ['all-errors' => true]);
        $this->assertContains('Test error message 2', $input, $message);

        $this->resetViewFactory();
    }

    public function testAttrsParameter()
    {
        $message = 'Some issue with "attrs" input parameter';

        $input = $this->formBuilder->input('testName', 'Test label', ['attrs' => [
            'test-attr' => 'test-attr-value'
        ]]);

        $this->assertContains('test-attr="test-attr-value"', $input, $message);
    }

    public function testId()
    {
        $message = 'Some issue with input id';

        $this->formBuilder->create('TestController@getWithoutRouteName', new TestEntity());

        $this->setConfigValueStub('generate_id', true);

        $input = $this->formBuilder->input('testName', 'Test label');
        //controller method - entity name - field name
        $this->assertContains('id="get-without-route-name-test-entity-test-name"', $input, $message);

        $input = $this->formBuilder->input('testName', 'Test label', ['id' => 'custom-test-id']);
        $this->assertContains('id="custom-test-id"', $input, $message);

        $this->setConfigValueStub('generate_id', false);

        $input = $this->formBuilder->input('testName', 'Test label');
        $this->assertNotContains('id="get-without-route-name-test-entity-test-name"', $input, $message);

        $input = $this->formBuilder->input('testName', 'Test label', ['id' => 'custom-test-id']);
        $this->assertContains('id="custom-test-id"', $input, $message);

        $this->formBuilder->end();
        $this->resetConfig();
    }

    public function testCommonInputAttributes()
    {
        //
    }

    public function testClasses()
    {
        //
    }

    public function testOnlyInputParameter()
    {
        //
    }

    public function testInputGroupParameter()
    {
        //
    }

    public function testLabel()
    {
        //
    }

    public function testFormInheriting()
    {
        //
    }
}