package org.drupal.amfserver {
	import fl.controls.TextArea;
	import nl.dpdk.commands.tasks.CallBackTask;
	import nl.dpdk.commands.tasks.Sequence;
	import nl.dpdk.services.gephyr.DrupalData;
	import nl.dpdk.services.gephyr.DrupalInvokeTask;
	import nl.dpdk.services.gephyr.DrupalProxy;

	import flash.display.MovieClip;
	import flash.net.registerClassAlias;

	/**
	 * Simple test class with simple output. This can be used as a document class for flash/air
	 * 
	 * get the whole nl.dpdk package for integrating flash and drupal from http://www.dpdk.nl/opensource/source-code
	 * 
	 * This class is set up in such a way that we can easily test certain use cases. check out the traces from the output to see if it all works.
	 * Make sure the permissions and access to resources are configured correctly.
	 * 
	 * To use this class to see it function correctly, make sure that all permissions are correct and there is at least one node present on your system.
	 * activate the resources that we try to call (as seen in the proxy.setHandler() method) and set the permissions correctly.
	 * 
	 * @author Rolf Vreijdenberger rolf@dpdk.nl
	 */
	public class Drupal7AmfServer extends MovieClip {
		// the proxy
		private var proxy : DrupalProxy;
		//a standard flash component
		public var output_txt: TextArea;

		public function Drupal7AmfServer() {
			// FILL IN WHAT IS APPROPRIATE FOR YOUR SETUP!
			var userName : String = "rolf";
			var password : String = "rolf";
			var endpoint : String = "http://d7/amf";
			

			// create proxy and configure with appropriate stuff
			proxy = new DrupalProxy(endpoint, DrupalProxy.VERSION_7);
			// set generic error handlers
			proxy.setErrorHandler(onError);
			proxy.setTimeOut(2500, onTimeOut);

			// set individual handlers for remote service methods (most are mapped to the same handler since we don't do anything specific with the data, just for testing)
			proxy.setHandler("system", "connect", onResult, onStatus);
			proxy.setHandler("user", "login", onResult, onStatus);
			proxy.setHandler("user", "logout", onResult, onStatus);
			proxy.setHandler("user", "retrieve", onResult, onStatus);
			proxy.setHandler("node", "retrieve", onResult, onStatus);
			proxy.setHandler("node", "delete", onResult, onStatus);
			proxy.setHandler("system", "get_variable", onResult, onStatus);
			proxy.setHandler("NonExistentService", "NonExistentMethod", onResult, onStatus);
			proxy.setHandler("AmfServerServiceProxy", "execute", onResult, onStatus);
			proxy.setHandler("amfservice", "ping", onResult, onStatus);
			proxy.setHandler("amfservice", "retrieve", onResult, onStatus);
			proxy.setHandler("amfservice", "sleep", onResult, onStatus);
			proxy.setHandler("amfservice", "getUser", onResult, onStatus);
			proxy.setHandler("amfservice", "sendUser", onResult, onStatus);
			proxy.setHandler("views", "retrieve", onResult, onStatus);

			// in this example and for testing, we create an asynchronous sequence of service methods we want to call on the drupal backend
			// when you're not using sequencing, you can call methods directly on the proxy: proxy.invoke("system", "connect"); etcetera
			// mark each method call with a remoteCallId, so we have some extra info when the result comes back (use a sniffer to see what's coming back, like charlesproxy.com)
			var sequence : Sequence = new Sequence();
      var message: String = '';
			message +=  "The amfserver testsuite is about to run with drupal username: '" + userName + "' and password: '" + password + "'";
			message +=  "\n";
			message +=  "The endpoint we are connecting to is: '" + endpoint + "'";
			message +=  "\n";
			message +=  "you should configure the DrupalProxy in this actionscript class with the right endpoint, username and password for your site to run the tests.";
			message +=  "\n";
			message +=  "Enable the resources that you need on the amfserver, see the comments on which resources you need to enable and also see the output of the testsuite";
			message +=  "\n";
			message +=  "Also make sure that you have set the right permisssions in your system at admin/people/permissions.";
			message +=  "\n";
			message +=  "\n";
			message +=  "shortcuts messages in the output are:";
			message +=  "\n";
			message +=  "   VVVVV -> should work if the resources are enabled and the right permissions are set. ";
			message +=  "You should see the V's combined with V's in the result message. otherwise, some config settings are off.";
			message +=  "\n";
			message +=  "   !!!!! -> should fail in the testsuite if all resources and permissions are configured as is required for the test. ";
			message +=  "You should see the !'s combined with !'s in the message. otherwise, some config settings are off.";
			message +=  "\n";
			message +=  "Here we go...";
			message +=  "\n";
			message +=  "\n";
			sequence.add(new CallBackTask(output, message));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV amfservice.ping is a test method of the amfservice on the amfserver and should work if the resource is enabled"));
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "ping", "hello amfserver"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV amfservice.ping with no argument. argument value should be 'nothing' as default."));
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "ping"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! amfservice.ping with too much arguments."));
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "ping", "hello", "this is an argument too many"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV classmapping"));
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "getUser"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV classmapped user sent back"));
			// yes we're doing some fancy classmapping here, automatic conversion of object types both on the amfserver and on the flash side :)
			//the first argument is the tag/alias we send over the net to the amfserver. The second argument is the actionscript Class that is bound to that tag/alias.
			//on the amfserver side, we have to 'register a class alias' that converts the sent object via the tag/alias to a php class
			//the php equivalent would be: $server->setClassMap('org.drupal.amfserver.User', 'MyPhpClass');
			//read more: http://help.adobe.com/en_US/FlashPlatform/reference/actionscript/3/flash/net/package.html#registerClassAlias()
			registerClassAlias('org.drupal.amfserver.User', User);
			var user : User = new User();
			user.id = 1;
			user.name = "tron";
			//now send the user object over the net, it will automatically be converted on the php side to an instance of a php class that is mapped on the amfserver
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "sendUser", user));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV amfservice.retrieve should work if the resource is enabled"));
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "retrieve"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! amfservice.sleep should fail since no required argument was sent."));
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "sleep"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV amfservice.sleep should work if you send an argument"));
			sequence.add(new DrupalInvokeTask(proxy, "amfservice", "sleep", 2));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV system.connect."));
			sequence.add(new DrupalInvokeTask(proxy, "system", "connect"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! system.connect with extra argument."));
			sequence.add(new DrupalInvokeTask(proxy, "system", "connect", "bogus argument"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! user.retrieve(1) should not work when only the logged in user can retrieve user profiles."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "retrieve", 1));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! user.login(): should not succeed, PROVIDE BAD username/password."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "login", "username", "password"));
			
			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! user.login(): should not succeed, only a username provided"));
			sequence.add(new DrupalInvokeTask(proxy, "user", "login", "username"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV user.login: should succeed PROVIDE the right username/password."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "login", userName, password));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! user.login: should fail, already logged in, this is a double login with the right username/password."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "login", userName, password));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV user.retrieve(1) should work when only the logged in user can retrieve user profiles."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "retrieve", 1));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV node.retrieve(1)."));
			sequence.add(new DrupalInvokeTask(proxy, "node", "retrieve", 1));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV node.retrieve with custom fields make sure you target a node id with cck fields and check the output."));
			sequence.add(new DrupalInvokeTask(proxy, "node", "retrieve", 3));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! node.retrieve(nodedoesnotexist)."));
			sequence.add(new DrupalInvokeTask(proxy, "node", "retrieve", 89761234));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! node.delete(makesuretheresourceisnotpermitted)."));
			sequence.add(new DrupalInvokeTask(proxy, "node", "delete", 89761234));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV system.get_variable(amfserver_version)."));
			sequence.add(new DrupalInvokeTask(proxy, "system", "get_variable", "amfserver_version"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! NonExistentService.NonExistentMethod: resource does not exist."));
			sequence.add(new DrupalInvokeTask(proxy, "NonExistentService", "NonExistentMethod"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! AmfServerServiceProxy.execute: should fail, this service is actually registered, but not mapped to a resource."));
			sequence.add(new DrupalInvokeTask(proxy, "AmfServerServiceProxy", "execute"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV user.logout."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "logout"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! user.retrieve(1) should not work now when we are logged out. only logged in user can retrieve user profiles."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "retrieve", 1));
			
			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! views.retrieve no argument"));
			sequence.add(new DrupalInvokeTask(proxy, "views", "retrieve"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "!!!!! views.retrieve nonexistent argument"));
			sequence.add(new DrupalInvokeTask(proxy, "views", "retrieve", "nonexistent"));
			
			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV views.retrieve existent view 'amfserver' (be sure to create the view)"));
			sequence.add(new DrupalInvokeTask(proxy, "views", "retrieve", "amfserver"));

			sequence.add(new CallBackTask(proxy.setRemoteCallId, "VVVVV user.login: should succeed last call in the row, this makes sure you are not logged out of the drupal system if you have this file online and are testing."));
			sequence.add(new DrupalInvokeTask(proxy, "user", "login", userName, password));


			sequence.add(new CallBackTask(output, "amfserver testing done!"));

			// call the service methods in order by starting the sequence
			sequence.execute();
		}
		
		/**
		 * simple method to get the output to the user
		 */
		public function output(message: String, newlines: int = 1):void{
			trace(message);
			output_txt.appendText(message + "\n");
		}

		private function onStatus(data : DrupalData) : void {
			output("!!!!!: " + data.getRemoteCallId() + " **message** " + data.getMessage() + "\n");
		}

		private function onResult(data : DrupalData) : void {
			output("VVVVV: " + data.getRemoteCallId() + " **data** " + data.getData() + "\n");
			if (data.getRemoteCallId() == "classmapping") {
				var user : User = User(data.getData());
				output("VVVVV: you got user: " + user.name + "\n");
			}
		}

		private function onTimeOut(data : DrupalData) : void {
			output("+++++: " + data.getRemoteCallId() + " **message** " + data.getMessage() + "\n");
		}

		private function onError(data : DrupalData) : void {
			output("-----: **low level error** " + data.getMessage() + "\n");
		}
	}
}
