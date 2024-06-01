class Character {
    constructor(name) {
        this.name = name;
        this.strength = 100;
    }

    attack(attacked) {
        if (this !== attacked) {
            const damage = 5;
            attacked.strength -= damage;
            if (attacked.strength < 0) {
                attacked.strength = 0;
            }
            console.log(`${this.name} attacks ${attacked.name} for ${damage} damage.`);
        } else {
            console.log(`${this.name} can't attack itself!`);
        }
    }

    status() {
        console.log(`${this.name}: strength ${this.strength}`);
    }
}

// Create three characters
const character1 = new Character("Character 1");
const character2 = new Character("Character 2");
const character3 = new Character("Character 3");

const characters = [character1, character2, character3];

// Main game loop
while (characters.length > 1) {
    const attackerIndex = Math.floor(Math.random() * characters.length);
    let targetIndex = attackerIndex; // Initialize targetIndex to be the same as attackerIndex initially

    while (targetIndex === attackerIndex) {
        targetIndex = Math.floor(Math.random() * characters.length);
    }

    const attacker = characters[attackerIndex];
    const target = characters[targetIndex];

    attacker.attack(target);

    characters.forEach((character, index) => {
        if (character.strength <= 0) {
            console.log(`${character.name} has been defeated!`);
            characters.splice(index, 1);
        }
    });
}

// Print the winner
const winner = characters[0];
console.log(`Winner: ${winner.name}, strength: ${winner.strength}`);
