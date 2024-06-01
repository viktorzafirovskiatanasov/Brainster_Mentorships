function User(name, email) {
  this.name = name;
  this.email = email;
  this.points = [];
  this.currentPoint = 0;
}

User.prototype.addPoints = function (point) {
  this.points.push(point);
  this.currentPoint = point;
};

User.prototype.showNameAndPoints = function () {
  if (this.points.length === 0) {
    return `Name: ${this.name} Points: No points yet`;
  } else {
    return `Name: ${this.name} Points: ${this.points.join(", ")}`;
  }
};

User.prototype.changeEmail = function (newEmail) {
  this.email = newEmail;
  console.log(User1);
console.log(User3);
console.log(User2);
};

const User1 = new User("John", "john@yahoo.com");
const User2 = new User("Jane", "jane@yahoo.com");
const User3 = new User("Mike", "mike@yahoo.com");
User1.addPoints(20);
User1.addPoints(30);
User2.addPoints(15);
User2.addPoints(20);
const userList = [User1, User2, User3];
function changeEmailInput() {
  let emailInput = document.querySelector("#new-email").value;
  let split = emailInput.split("/");

  if (split.length == 2) {
    let nameToSearch = split[0].trim();
    let newEmail = split[1].trim();

    

    for (const user of userList) {
      if (user.name === nameToSearch) {
        user.changeEmail(newEmail);
        document.getElementById(
          "email-message"
        ).textContent = `${user.name}'s new email address is: ${newEmail}`;
        break;
      }
    }
  } else {
    User2.changeEmail(emailInput);
    document.getElementById(
        "email-message"
      ).textContent = `${User2.name}'s new email address is: ${emailInput}`;
  }
}
function displayUsers() {
    const userListP = document.getElementById('users-paragraph');
    userListP.innerHTML = userList.map(user => user.showNameAndPoints()).join('<br>');
}

function printWinner() {
    let maxPoints = -1;
    let winner = null;

    userList.forEach(user => {
        const totalPoints = user.points.reduce((acc, cur) => acc + cur, 0);
        if (totalPoints > maxPoints) {
            maxPoints = totalPoints;
            winner = user;
        }
    });

    if (winner) {
        document.getElementById(
            "winner-message"
          ).textContent = `Winner is ${winner.name}, total points: ${maxPoints}`;
      }
    }

    displayUsers();
console.log(User1);
console.log(User3);
console.log(User2);

