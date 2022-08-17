<?php
interface CRUD
{
    public function create();
    public function read();
    public function update();
    public function delete();

    //devuelve un solo registro
    public function read_by_id();

    //devuelve todos los registros
    public function read_all();

    //devuelve varios registros
    public function read_by_column();
}
