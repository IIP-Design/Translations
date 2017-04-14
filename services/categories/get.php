<?php

namespace Categories;

class Get {

    private $categories;

    public function __construct($categories) {
        $this->categories = $categories;
    }

    public function call($string = true) {

        $return_val = $this->divideCategories($this->categories);

        if ($string) {
            $this->stringify($return_val);
        }

        return $return_val;

    }

    private function divideCategories($categories) {
        $return_val = ['language' => []];

        foreach ($categories as $key => $category) {
            $return_val[get_category($category->parent)->description][$key] = $category->name;
        }

        return $return_val;

    }
    private function stringify(&$return_val) {
        foreach ($return_val as $key => $value) {
            $return_val[$key] = implode($value, ', ');
        }
    }
}