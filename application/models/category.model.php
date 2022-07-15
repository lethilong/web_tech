<?php
class CategoryModel
{
	private $error = "";

	public function create($DATA)
	{

		$DB = Database::newInstance();
		$arr['category'] = ucwords($DATA->category);

		if (!$arr['category']) {
			$_SESSION['error'] = "Please enter a valid category name";
		}

		if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
			$query = "insert into categories (category) values (:category)";
			$check = $DB->write($query, $arr);

			if ($check) {
				return true;
			}
		}

		return false;
	}

	public function getcategory()
	{
		$db = Database::getInstance();
		$query = "select * from categories";
		$result = $db->read($query);
		if (is_array($result)) {
			return $result;
		}
		return false;
	}

	public function make_table($cats)
	{

		$result = "";
		if (is_array($cats)) {
			foreach ($cats as $cat_row) {
				$edit_args = $cat_row->id . "," . $cat_row->category;
				$result .= "<tr>";

				$result .= '
						<td><a href="basic_table.html#">' . $cat_row->category . '</a></td>
	                    <td>
                        	<button onclick="show_edit_category(' . $cat_row->id . ', event)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                       		<button onclick="get_id_delete(' . $cat_row->id . ')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
	                  	</td>
					';

				$result .= "</tr>";
			}
		}

		return $result;
	}

	public function get_one($id)
	{

		$id = (int)$id;

		$DB = Database::newInstance();
		$data = $DB->read("select * from categories where id = '$id' limit 1");
		return $data[0];
	}

	public function get_one_by_name($name)
	{

		$name = addslashes($name);

		$DB = Database::newInstance();
		$data = $DB->read("select * from categories where category like :name limit 1", ["name" => $name]);
		return $data[0];
	}


	public function get_all()
	{

		$DB = Database::newInstance();
		return $DB->read("select * from categories order by id desc");
	}
	public function edit($data)
	{
		$arr['id'] = $data->id;
		$arr['category'] = $data->category;
		$DB = Database::newInstance();
		if (!$arr['category']) {
			$_SESSION['error'] = "Please enter a valid category name";
		}
		$query = "update categories set category = :category where id = :id limit 1";
		if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
			$check = $DB->write($query, $arr);
			if ($check) {
				return true;
			}
		}

		return false;
	}
	public function delete($data)
	{
		$id = $data->id;
		$DB = Database::newInstance();
		$query = "delete from categories where id = '$id' limit 1";
		$DB->write($query);
	}
}
