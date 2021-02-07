export default{
	template: 
	`<ul :style="style"> <li style="padding-right:25px;" v-for="object in objects">{{object.name}}</li></ul>`
,
data() { 
    fetch("./input.json")
    .then( response => response.json())
    .then( jsObject => this.objects = jsObject.objects
    )
    .catch( function (error){
        console.error("Request failed ", error);
    });

	return {
	objects: {},
    content: "test"
}},
props: {
	vertical: {type: Boolean, default: false},
},

computed: {
	style(){ return {
		'display': "flex",
		'flex-direction': (this.vertical ? "column": "row" )
		}
	}
}
}