class Pet {
  constructor(type) {
    this.hunger = 0;
    this.energy = 10;
    this.type = type;
    this.isSleeping = false;
  }

  isvalidEnergy() {
    if (this.energy < 0) {
      this.energy = 0;
    } else if (this.energy > 10) {
      this.energy = 10;
    }
  }

  isvalidHunger() {
    if (this.hunger < 0) {
      this.hunger = 0;
    } else if (this.hunger > 10) {
      this.hunger = 10;
    }
  }

  play() {
    if(this.isSleeping == true){
      return `Please wake your Pet Before doing any actions`
    }
    if (this.energy >= 2 && this.hunger <= 8) {
      this.energy -= 2;
      this.hunger += 2;
      this.isvalidEnergy();
      this.isvalidHunger();
      return `We're playing`;
    } else if (this.energy < 2) {
      return `I can't play right now, I'm out of energy`;
    } else {
      return `I can't play right now, I'm hungry`;
    }
  }

  eat() {
    if(this.isSleeping == true){
      return `Please wake your Pet Before doing any actions`
    }
    if (this.hunger >= 1) {
      this.energy += 1;
      this.hunger -= 1;
      this.isvalidEnergy();
      this.isvalidHunger();
      return `Eating... This is some tasty food`;
    } else {
      return `I don't want to eat, I'm already full`;
    }
  }

  speak() {
    if(this.isSleeping == true){
      return `Please wake your Pet Before doing any actions`
    }
    if (this.hunger <= 9) {
      this.hunger += 1;
      if (this.type == "cat") {
        return `MEOWWWW`;
      } else {
        return `WOOOOF`;
      }
    }
  }

  sleep() {
    if(this.isSleeping == true){
      return `Please wake your Pet Before doing any actions`
    }
    if (this.energy <= 7 && this.hunger <= 5) {
      this.isSleeping = true;
      this.energy += 5;
      this.hunger += 2;
      this.isvalidEnergy();
      this.isvalidHunger();
      return `Dreaming...`;
    } else {
      return `Sleep? Now? But there are so many things that can be done`;
    }
  }

  wakeup() {
    if (this.isSleeping) {
      this.isSleeping = false;
      return `Ready for some action`;
    }
    else{
      return `I am not asleep`
    }
  }

  getHunger() {
    return this.hunger;
  }

  getEnergy() {
    return this.energy;
  }
}

function upDateHunger() {
  const hungerBar = currentPet.type === "dog" ? document.getElementById("hungerBarDog") : document.getElementById("hungerBarCat");
  const currentHunger = currentPet.getHunger();
  hungerBar.style.width = (10 - currentHunger) * 10 + "%";
}

function upDateEnergy() {
  const energyBar = currentPet.type === "dog" ? document.getElementById("energyBarDog") : document.getElementById("energyBarCat");
  const currentEnergy = currentPet.getEnergy();
  energyBar.style.width = (10 - currentEnergy) * 10 + "%";
}

let currentPet = null;
let cat = null;
let dog = null;


document.getElementById("cat").addEventListener("click", function () {
  currentPet = new Pet("cat");
  
  console.log(currentPet)
  document.getElementById("startSection").style.display = "none";
  document.getElementById("dogSection").style.display = "none";
  document.getElementById("catSection").style.display = "block";
  
});

document.getElementById("dog").addEventListener("click", function () {
  currentPet = new Pet("dog");

  document.getElementById("startSection").style.display = "none";
  document.getElementById("catSection").style.display = "none";
  document.getElementById("dogSection").style.display = "block";
});
document.getElementById("dogButtonBox").addEventListener("click", function (event) {
  if (event.target.classList.contains("action-button")) {
    if (currentPet) {
      let output = document.querySelector(".msgBoxDog");
      let p = document.createElement("p");

      switch (event.target.id) {
        case "playDog":
          console.log(currentPet);
          p.innerText = currentPet.play();
          break;
        case "eatDog":
          console.log(currentPet);
          p.innerText = currentPet.eat();
          break;
        case "sleepDog":
          console.log(currentPet);
          p.innerText = currentPet.sleep();
          break;
        case "speakDog":
          console.log(currentPet);
          p.innerText = currentPet.speak();
          break;
        case "wakeupDog":
          console.log(currentPet);
          p.innerText = currentPet.wakeup();
          break;
        case "restartDog":
          console.log(currentPet);
          currentPet = new Pet("dog");
          upDateHunger();
          upDateEnergy();
          break;
      }

      if (event.target.id !== "restartDog") {
        output.innerHTML = "";
        output.appendChild(p);
        upDateHunger();
        upDateEnergy();
      }
    }
  }
});

document.getElementById("catButtonBox").addEventListener("click", function (event) {
  if (event.target.classList.contains("action-button")) {
    if (currentPet) {
      let output = document.querySelector(".msgBoxCat");
      let p = document.createElement("p");

      switch (event.target.id) {
        case "playCat":
          console.log(currentPet);
          p.innerText = currentPet.play();
          break;
        case "eatCat":
          console.log(currentPet);
          p.innerText = currentPet.eat();
          break;
        case "sleepCat":
          console.log(currentPet);
          p.innerText = currentPet.sleep();
          break;
        case "speakCat":
          console.log(currentPet);
          p.innerText = currentPet.speak();
          break;
        case "wakeupCat":
          console.log(currentPet);
          p.innerText = currentPet.wakeup();
          break;
        case "restartCat":
          console.log(currentPet);
          currentPet = new Pet("cat");
          upDateHunger();
          upDateEnergy();
          break;
      }

      if (event.target.id !== "restartCat") {
        output.innerHTML = "";
        output.appendChild(p);
        upDateHunger();
        upDateEnergy();
      }
    }
  }
});
