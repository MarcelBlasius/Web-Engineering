export default{
    template: `<div id="app">
    <textarea @keyup="update" type="text" v-model="input"></textarea>
    <p>Buchstaben: {{buchstaben}}</p>
    <p>Leerzeichen: {{leerzeichen}}</p>
    <p>Worte: {{worte}}</p>
   </div>
</div>`,

data() { return {
    input: "",
    buchstaben: 0,
    leerzeichen: 0,
    worte: 0
}},
methods: {
    update(){
        this.buchstaben = 0;
        this.leerzeichen = 0;
        for(const c of this.input){
            if(c === " "){
                this.leerzeichen++;
            }else {
                this.buchstaben++;
            }
        }

        this.worte = 0;
        for(const wort of this.input.split(" ")){
            if( wort !== ""){
                this.worte++;
            }
        }
    }
}
}



