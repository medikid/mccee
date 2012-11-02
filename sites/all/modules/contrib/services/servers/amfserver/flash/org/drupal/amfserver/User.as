package org.drupal.amfserver {
	/**
	 * simple demo class for testing classmapping from server to flash and vice versa.
	 * it will be mapped in the class that uses this class to a class that comes back from the server.
	 * the server will also map an incoming class to a local class and vice versa.
	 * @author Rolf Vreijdenberger rolf@dpdk.nl
	 */
	public class User {
		public var id: int;
		public var name: String;
	}
}
