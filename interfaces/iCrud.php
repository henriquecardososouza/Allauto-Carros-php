<?php

    interface iCrud {
        public function create(Usuario $object);
        public function read(int $id);
        public function update(Usuario $object);
        public function delete(int $id);
    }

?>