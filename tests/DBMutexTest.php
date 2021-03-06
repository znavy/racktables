<?php

class DBMutexTest extends RTTestCase
{
	/**
	 * @group small
	 */
	public function testExisting ()
	{
		$name = sprintf ('mutex-%s-%u', get_class(), getmypid());
		$this->assertSame (TRUE, setDBMutex ($name));
		$this->assertSame (TRUE, releaseDBMutex ($name));
	}

	/**
	 * @group small
	 */
	public function testNonExisting ()
	{
		$this->assertSame (FALSE, releaseDBMutex (get_class() . getmypid()));
	}
}
