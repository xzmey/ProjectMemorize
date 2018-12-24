$("article p:first").addClass("onDeck");


$("span").on("click", function() {
	//alert(1);
	$(this).toggleClass("onClick");
	if(max > 7){

	}
	else{
		max = max + 1;
	}
})

$("button.openAll").on("click", function() {
	$(".onClick").removeClass("onClick")
})

var max =7;

$("button.next").on("click", function() {
	if(max < 2){

	}
	else{
		var min = 0;
		max = max - 1;
		var paragraphLength = $("p.onDeck span").length;
		var randN= 0;
		while(randN <= paragraphLength){
			randN = randN + min + Math.floor(Math.random() * (max + 1 - min));
			console.log(randN);
			$(".textArticle p.onDeck span").eq(randN).addClass("onClick");
		}
	}
})

$("button.openAll").on("click", function() {
	max =7;
	console.log(max)
})
