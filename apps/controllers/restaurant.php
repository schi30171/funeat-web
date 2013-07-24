<?php defined('BASEPATH') or die('No direct script access allowed');

/**
 * Restaurant
 */
class Restaurant extends MY_Controller
{
	/**
	 * Feature action list constants
	 */
	const FEATURE_ACTION_LIST = 'list';

	/**
	 * Feature action list parameter for show restaurant
	 */
	const FEATURE_ACTION_LIST_RESTAURANT = 'restaurant';

	/**
	 * Feature action add constants
	 */
	const FEATURE_ACTION_ADD = 'add';

	/**
	 * Feature action update constants
	 */
	const FEATURE_ACTION_UPDATE = 'update';

	/**
	 * Feature action delete constants
	 */
	const FEATURE_ACTION_DELETE = 'delete';

	/**
	 * @var models\Restaurant
	 */
	protected $restaurant;

	/**
	 * @var models\Feature
	 */
	protected $feature;

	/**
	 * Validation config
	 *
	 * @var array
	 */
	protected $restaurant_validation = array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		),
		array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required'
		),
		array(
			'field' => 'tel',
			'label' => 'Tel'
		),
		array(
			'field' => 'hours',
			'label' => 'Hours'
		),
		array(
			'field' => 'website',
			'label' => 'Website'
		),
		array(
			'field' => 'images',
			'label' => 'Images'
		),
		array(
			'field' => 'features',
			'label' => 'Features'
		)
	);

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct('default');

		// Load library
		$this->load->library('doctrine');
		$this->load->library('form_validation');
	}

	/**
	 * Index page
	 */
	public function index($type = 'html')
	{
		switch ($type)
		{
			default :
			case self::OUTPUT_TYPE_HTML :
				$this->view('restaurant/list');
				break;
			case self::OUTPUT_TYPE_JSON :
				// TODO: output JSON
				break;
			case self::OUTPUT_TYPE_RSS :
				// TODO: output RSS
				break;
		}
	}

	/**
	 *
	 */
	public function add()
	{
		$this->feature = new models\Feature();
		$this->restaurant = new models\Restaurant();

		$this->form_validation->set_rules($this->restaurant_validation);

		if ($this->form_validation->run() == false)
		{
			$this->load->helper('form');

			$this->setData('features', $this->feature->getItems());
			$this->view('restaurant/add');
		}
		else
		{
			$restaurant = $this->restaurant->getInstance();

			$restaurant->name = $this->input->post('name');
			$restaurant->address = $this->input->post('address');

			// TODO:
			//$restaurant->tel = $this->input->post('tel');

			// TODO:
			//$restaurant->hours = $this->input->post('hours');

			$restaurant->website = $this->input->post('website');

			// TODO:
			//$restaurant->images = $this->input->post('images');

			$features = $restaurant->getFeatures();

			foreach ($this->input->post('features') as $v)
			{
				$features[] = $this->feature->getItem((int)$v);
			}

			$restaurant->setFeatures($features);

			$this->restaurant->save($restaurant);

			// TODO: after save data?
		}
	}

	/**
	 * Processing features mapping
	 *
	 * @param	action
	 */
	public function feature($action = 'list')
	{
		$this->feature = new models\Feature();

		switch ($action)
		{
			default :
			case self::FEATURE_ACTION_LIST :
				$list = $this->feature->getItems();
				$output = array();
				foreach ($list as $v)
				{
					$showRestaurant = $this->input->get(self::FEATURE_ACTION_LIST_RESTAURANT);

					if ($showRestaurant === false)
					{
						$output[] = $v->toArray(false);
					}
					else
					{
						$output[] = $v->toArray(true);
					}
				}
				header('Cache-Control: no-cache');
				header('Content-type: application/json');

				echo json_encode($output);
				break;
			case self::FEATURE_ACTION_ADD :
				$this->load->library('form_validation');

				// Return
				$return = false;

				// Set rules
				$this->form_validation->set_rules('title', 'Title', 'required');

				if ($this->form_validation->run() == true)
				{
					$title = trim($this->input->post('title'));
					$duplicate = $this->feature->getItem($title, 'title');

					if (empty($duplicate))
					{
						$data = $this->feature->getInstance();
						$data->setTitle(trim($this->input->post('title')));
						$this->feature->save($data);

						$return = true;
					}
				}
				echo json_encode($return);
				break;
			case self::FEATURE_ACTION_UPDATE :
				// TODO:
				break;
			case self::FEATURE_ACTION_DELETE :
				// TODO:
				break;
		}
	}

}
