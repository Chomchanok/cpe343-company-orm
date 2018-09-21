<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    public function testEmployeeAll()
    {
        $response = $this->call('get', '/employees');
        $employees = json_decode($response->content());
        $this->assertTrue(count($employees) > 0);
    }

    public function testEmployeeOne()
    {
        $response = $this->call('get', '/employees/123456789');
        $employee = json_decode($response->content());
        $this->assertEquals($employee->ssn, '123456789');
    }

    public function testEmployeeDepartment()
    {
        $this->get('/employees/123456789/department')->seeJson([
            'dname' => 'Research'
        ]);
    }

    public function testEmployeeDependents()
    {
        $response = $this->call('get', '/employees/123456789/dependents');
        $employees = json_decode($response->content());
        $this->assertEquals(count($employees), 3);
    }

    public function testEmployeeSupervisor()
    {
        $response = $this->call('get', '/employees/123456789/supervisor');
        $supervisor = json_decode($response->content());
        $this->assertEquals($supervisor->ssn, '333445555');
    }

    public function testEmployeeSupervisees()
    {
        $response = $this->call('get', '/employees/333445555/supervisees');
        $supervisees = json_decode($response->content());
        $this->assertEquals(count($supervisees), 2);
    }

    public function testEmployeeManager()
    {
        $response = $this->call('get', '/employees/888665555/manager');
        $department = json_decode($response->content());
        $this->assertEquals($department->dname, 'Headquarters');
    }

    public function testEmployeeProjects()
    {
        $response = $this->call('get', '/employees/123456789/projects');
        $projects = json_decode($response->content());
        $this->assertEquals(count($projects), 2);

    }

    public function testDepartmentAll()
    {
        $response = $this->call('get', '/departments');
        $projects = json_decode($response->content());
        $this->assertEquals(count($projects), 3);
    }

    public function testDepartmentOne()
    {
        $this->get('/departments/5')->seeJson([
            'dname' => 'Research'
        ]);
    }

    public function testDepartmentHasManyProjects()
    {
        $response = $this->call('get', '/departments/5/projects');
        $projects = json_decode($response->content());
        $this->assertEquals(count($projects), 3);
    }

    public function testProjectBelongsToOneDepartment()
    {
        $this->get('/projects/1/department')->seeJson([
            'dname' => 'Research'
        ]);
    }

    public function testDepartmentHasManyLocations()
    {
        $response = $this->call('get', '/departments/5/locations');
        $projects = json_decode($response->content());
        $this->assertEquals(count($projects), 3);
    }

    public function testDepartmentHasAManager()
    {
        $this->get('/departments/1/manager')->seeJson([
            'fname' => 'James'
        ]);
    }

    public function testProjectAll()
    {
        $response = $this->call('get', '/projects');
        $projects = json_decode($response->content());
        $this->assertEquals(count($projects), 6);
    }

    public function testProjectOne()
    {
        $response = $this->call('get', '/projects/1');
        $project = json_decode($response->content());
        $this->assertEquals($project->pname, 'ProductX');
    }

    public function testProjectEmployees()
    {
        $response = $this->call('get', '/projects/1/employees');
        $projects = json_decode($response->content());
        $this->assertEquals(count($projects), 2);
    }
}
