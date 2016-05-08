<?php

namespace Framework\Database {

    use Framework\Base as Base;

    class Connector extends Base {

        protected $_from;
        protected $_fields;
        protected $_limit;
        protected $_offset;
        protected $_order;
        protected $_direction = 'asc';
        protected $_join = array();
        protected $_where = array();

        private function clear_info() {
            $this->_from = '';
            $this->_fields = '';
            $this->_limit = '';
            $this->_offset = '';
            $this->_order = '';
            $this->_direction = 'asc';
            $this->_join = array();
            $this->_where = array();            
        }

        private function quote($value) {
            if (is_string($value)) {
                $escaped = $this->escape_string($value);
                return "'{$escaped}'";
            }
            if (is_array($value)) {
                $buffer = array();
                foreach ($value as $i) {
                    array_push($buffer, $this->quote($i));
                }
                $buffer = join(", ", $buffer);
                return "({$buffer})";
            }
            if (is_null($value)) {
                return "NULL";
            }
            if (is_bool($value)) {
                return (int) $value;
            }
            return $this->escape_string($value);
        }

        public function select($fields = array("*")) {
            $this->_fields = $fields;
            return $this;
        }

        public function from($from) {
            $this->_from = $from;
            return $this;
        }

        public function join($join, $on, $fields = array()) {
            if (empty($join)) {
                echo "Database Connector: truong 'join' bi rong!";
                throw new Exception("Database Connetor: join");
            }
            if (empty($on)) {
                echo "Database Connector: truong 'join on' bi rong!";
                throw new Exception("Database Connetor: join on");
            }
			$this->_fields += array($join => $fields);
            $this->_join[] = "JOIN {$join} ON {$on}";
            return $this;
        }

        public function limit($limit, $page = 1) {
            if (empty($limit)) {
                echo "Database Connector: truong 'limit' bi rong!";
                throw new Exception("Database Connetor: limit");
            }
            $this->_limit = (int) $limit;
            $this->_offset = $limit * ($page - 1);
            return $this;
        }

        public function order($order, $direction = 'asc') {
            if (empty($limit)) {
                echo "Database Connector: truong 'order' bi rong!";
                throw new Exception("Database Connetor: order");
            }
            $this->_order = $order;
            $this->_direction = $direction;
            return $this;
        }

        public function where($arg1, $condition, $arg2) {
            $arg1 = '`' . $arg1 . '`';
            $arg2 = $this->quote($arg2);
            $this->_where[] = $arg1 . ' ' . $condition . ' ' . $arg2;
            return $this;
        }

        // kết quả trả về thành công hay không
        public function insert($table, $data = array()) {
            $template = "INSERT INTO `%s` (`%s`) VALUES (%s)";
            $fileds = array();
            $values = array();
            foreach ($data as $field => $value) {
                $fields[] = $field;
                $values[] = $this->quote($value);
            }
            $fields = join("`, `", $fields);
            $values = join(", ", $values);
            $sql = sprintf($template, $table, $fields, $values);
            $this->clear_info();
            return $this->execute($sql);
        }

        public function update($table, $data = array()) {
            $template = "UPDATE `%s` SET %s %s %s";
            $parts = array();
            $where = $limit = '';
            foreach ($data as $field => $value) {
                $parts[] = "`{$field}` = " . $this->quote($value);
            }
            $parts = join(", ", $parts);
            if (!empty($this->_where)) {
                $where = join(" AND ", $this->_where);
                $where = "WHERE {$where}";
            }
            if (!empty($this->_limit)) {
                $limit = "LIMIT {$this->_limit}";
            }
            $sql = sprintf($template, $table, $parts, $where, $limit);
            $this->clear_info();
            return $this->execute($sql);
        }
        
        // xoá bản ghi trong database
        public function delete($table) {
            $where = $limit = '';
            $template = "DELETE FROM %s %s %s";
            if (!empty($this->_where)) {
                $where = join(", ", $this->_where);
                $where = "WHERE {$where}";
            }
            if (!empty($this->_limit)) {
                $limit = "LIMIT {$this->_limit}";
            }
            $sql = sprintf($template, $table, $where, $limit);
            $this->clear_info();
            return $this->execute($sql);
        }
        
        public function query($sql) {
            $this->escape_string($sql);
            return $this->execute($sql);
        }

        // lấy dữ liệu từ database
        public function get($sql = '') {
            // nếu người dùng ko nhập câu sql, xây dựng câu lệnh sql
            if (empty($sql)) {
                $fields = array();
                $where = $order = $limit = $join = '';
                $template = "SELECT %s FROM %s %s %s %s %s";

                // chọn các trường
                foreach ($this->_fields as $field => $alias) {
                    if (is_string($field)) {
                        $fields[] = "`{$field}` AS `{$alias}`";
                    } else {
                        $fields[] = "`{$alias}`";
                    }
                }

                // chọn bảng
                $table = "`{$this->_from}`";

                // kết nối các bảng
                $fields = join(", ", $fields);
                if (!empty($this->_join)) {
                    $join = join(" ", $this->_join);
                }

                // điều kiện chọn
                if (!empty($this->_where)) {
                    $where = join(" AND ", $this->_where);
                    $where = "WHERE {$where}";
                }

                // sắp xếp
                if (!empty($this->_order)) {
                    $order = "ORDER BY {$this->_order} {$this->_direction}";
                }

                // limit
                if (!empty($this->_limit)) {
                    if ($this->_offset) {
                        $limit = "LIMIT {$this->_limit}, {$this->_offset}";
                    } else {
                        $limit = "LIMIT {$this->_limit}";
                    }
                }

                // tạo câu lệnh sql
                $sql = sprintf($template, $fields, $table, $join, $where, $order, $limit);
                $this->clear_info();
            }

            // thực thi câu lệnh sql
            $this->query = $this->execute($sql);
        }
        
        protected $query;

    }

}
