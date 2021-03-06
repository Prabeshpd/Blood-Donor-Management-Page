<?php
    class Paginate
    {
        public $current_page;
        public $items_per_page;
        public $items_total_count;
         public function __construct($pages=1, $items_per_page=6, $items_total_count=0)
         {
             $this->current_page = (int)$pages;
             $this->items_per_page = (int)$items_per_page;
             $this->items_total_count = (int)$items_total_count;
         }
         public function next()
         {
             return $this->current_page + 1;
         }
        public function previous()
        {
            return $this->current_page - 1;
        }
        public function count_total_pages()
        {
            return ceil($this->items_total_count/$this->items_per_page);
        }
        public function has_previous()
        {
            return $this->previous() >= 1 ?true:false;
        }
        public function has_next()
        {
            return $this->next() <= $this->count_total_pages() ?true:false;
        }
        public function offset()
        {
            return ($this->current_page - 1) * $this->items_per_page;
        }

    }








?>