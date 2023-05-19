

class Notification{

	success(){
		new Noty({
	    type:'success',
	    layout:'topRight',
	    text: ' Data insert Succyfully done',
	    timeout:1000
	}).show();
	}

	cart_success(){
			new Noty({
		    type:'error',
		    layout:'topRight',
		    text: 'Product Added successfully',
		    timeout:1000
		}).show();
		}

		remove(){
			new Noty({
		    type:'error',
		    layout:'topRight',
		    text: 'product delete successfully',
		    timeout:1000
		}).show();
		}


	alert(){
		new Noty({
	    type:'alert',
	    layout:'topRight',
	    text: 'Succyfully done',
	    timeout:1000
	}).show();
	}


	error(){
		new Noty({
	    type:'error',
	    layout:'topRight',
	    text: 'Succyfully done',
	    timeout:1000
	}).show();
	}


	warning(){
		new Noty({
	    type:'warning',
	    layout:'topRight',
	    text: 'Opps ! wrong',
	    timeout:1000
	}).show();
	}

	image_validation(){
		new Noty({
	    type:'error',
	    layout:'topRight',
	    text: 'upload image less then 1mb',
	    timeout:10000
	}).show();
	}



}

export default Notification=new Notification();