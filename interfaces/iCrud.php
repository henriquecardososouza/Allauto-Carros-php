<?php

    interface iCrud {
        public function create($object);
        public function read(int $id);
        public function update($object);
        public function delete(int $id);
    }

?>