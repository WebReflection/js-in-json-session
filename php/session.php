<?php namespace JSinJSON;

/*!
 * ISC License
 *
 * Copyright (c) 2021, Andrea Giammarchi, @WebReflection
 *
 * Permission to use, copy, modify, and/or distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY
 * SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION
 * OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN
 * CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */

class Session {
  public function __construct($modules) {
    $this->map = new \stdClass;
    $this->map->_ = $modules->_;
    $this->flushed = array();
    $this->modules = $modules;
  }
  public function add($module) {
    if (!property_exists($this->map, $module)) {
      $info = $this->modules->$module;
      foreach ($info->dependencies as $dependency)
        $this->add($dependency);
      $this->map->$module = $info;
    }
  }
  public function flush() {
    $output = array();
    foreach ($this->map as $name => $info) {
      if (array_search($name, $this->flushed, true) === false) {
        $this->flushed[] = $name;
        $output[] = $info->module;
      }
      if (0 < strlen($info->code))
        $output[] = $info->code;
    }
    $this->map = new \stdClass;
    return implode("\n", $output);
  }
}

?>