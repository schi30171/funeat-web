<?php

namespace models;

use stdClass as stdClass;
use models\entity\restaurant\Features;
use models\restaurant\Hours;

/**
 * Config data
 *
 * @category		Models.Entity
 * @author			Miles <jangconan@gmail.com>
 * @version			1.0
 */
class Config
{
	/**
	 * Filename constant
	 *
	 * @var		string
	 */
	const FILENAME = 'config/config.json';

	/**
	 * Hours Feature Mapping
	 *
	 * @var		string
	 */
	const CONFIG_HOURS_FEATURE_MAPPING = 'HoursFeatureMapping';
	/**
	 * @var		Array
	 */
	private $data;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$f = APPPATH . self::FILENAME;
		if (is_file($f))
		{
			$this->data = json_decode(file_get_contents($f));
		}
		else
		{
			$this->data = new stdClass();
		}

		if (!isset($this->data->config))
		{
			$this->data->config = new stdClass();
			$this->save();
		}
	}

	/**
	 * Save
	 */
	public function save()
	{
		$f = APPPATH . self::FILENAME;
		$fp = fopen($f, 'w+');
		fwrite($fp, json_encode($this->data));
		fclose($fp);
	}

	/**
	 * Put element
	 *
	 * @param		string		$element
	 * @param		mixed		$value
	 * @param		string		$ns
	 *
	 * @return		mixed
	 */
	public function put($id, $value, $ns = 'config')
	{
		if (!isset($this->data->$ns))
		{
			$this->data->$ns = new stdClass();
		}
		$this->data->$ns->$id = $value;
	}

	/**
	 * Put elements
	 *
	 * @param		array		$element		Key-Value mapping
	 * @param		string		$ns
	 *
	 * @return		mixed
	 */
	public function puts(array $values, $ns = 'config')
	{
		foreach ($element as $id => $value)
		{
			if (is_string($id))
			{
				$this->putSetting($key, $value, $ns);
			}
		}
	}

	/**
	 * Get element
	 *
	 * @param		string
	 * @param		string
	 *
	 * @return		mixed
	 */
	public function get($id = null, $ns = 'config')
	{
		$result = null;

		if (isset($this->data->$ns))
		{
			if ($id === null)
			{
				$result = $this->data->$ns;
			}
			else
			{
				if (isset($this->data->$ns->$id))
				{
					$result = $this->data->$ns->$id;
				}
			}
		}
		return $result;
	}

	/**
	 * Put mapping between Hours constant and Features
	 *
	 * @param		integer
	 * @param		Features
	 */
	public function putHoursFeatureMapping($hours, Features $feature)
	{
		if (Hours::checkTimeDivide($hours))
		{
			$this->put($hours, $feature->getId(), self::CONFIG_HOURS_FEATURE_MAPPING);
		}
	}

	/**
	 * Put mapping between Hours constant and Features
	 *
	 * @param		integer
	 * @param		Features
	 */
	public function getHoursFeatureMapping()
	{
		$this->get(null, self::CONFIG_HOURS_FEATURE_MAPPING);
	}

}
