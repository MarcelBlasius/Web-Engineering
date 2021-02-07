export default{
	template: 
	`<div><ul :style="style"> <li style="padding-right:25px;" v-for="object in objects" @click="update(object)">{{object.name}}</li></ul>
    <br><p>{{content}}</p>
    <br><p>{{references}}</p>
    </div>`,

data() { 
    fetch("./input9.3.json")
    .then( response => response.json())
    .then( jsObject => this.objects = jsObject.objects
    )
    .catch( function (error){
        console.error("Request failed ", error);
    });

	return {
	objects: {},
    content: "",
    references: ""
}},

computed: {
	style(){ return {
		'display': "flex",
		'flex-direction': (this.vertical ? "column": "row" )
		}
	}
},

methods: {
   update(object){
        this.content = object.content;
        this.references = object.references;
   }
}

}