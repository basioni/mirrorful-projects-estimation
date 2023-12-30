const projectEstimation = {
    typeRate : 1 ,
    squareFeet : 1 , 
    durationRate: 1,
    cost: function () {
        return this.typeRate * this.squareFeet * this.durationRate;
    }
}

const setTypeRate = rate => {
    projectEstimation.typeRate = rate;
    document.getElementById("step2").style.visibility = "visible";
    document.getElementById("step1").style.display = "none";
}

const setSqaureFeet = () =>{
    projectEstimation.squareFeet = document.getElementById("sqaureFeet").value;
    document.getElementById("step3").style.visibility = "visible";
    document.getElementById("step2").style.display = "none";
}

const setDurationRate = rate => {
    projectEstimation.durationRate = rate;
    document.getElementById("step4").style.visibility = "visible";
    document.getElementById("step3").style.display = "none";
    setEstimation();
}

const setEstimation = () => {
    console.log(projectEstimation.cost());
    document.getElementById("min-cost").innerHTML = (projectEstimation.cost() * 80)/100;
    document.getElementById("avg-cost").innerHTML = projectEstimation.cost();
    document.getElementById("high-cost").innerHTML = (projectEstimation.cost() * 120)/100;
}