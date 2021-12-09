require('./bootstrap');

/*
*
* Front End App to handle basic Student Object operations
*
* Requirements:
*
* 1. Write a class called Assignment, which has three instance variables.
*   title : a string
*   score : a double
*   description : a string
*
* 2. The Assignment class should validate and perform for the score input, based on the requirements below when initialized. Otherwise throw an error:
*       - Must be positive between 0 and 10
*       - If the decimal part is 0.6 or greater, round to next whole number.
*       - If the decimal part is 0.4 or lower, round to previous whole number.
*       - If the decimal part is 0.5, leave as it is. At the end returning scores should can only have 0 or .5 as the decimal part.
*
* 2. The Assignment class should have the following methods:
*   getQuickSummary: Print Assignment title and description in a readable format.
*   getAssignmentScore: Print score
*
* 3. Write a class called Student, which has three instance variables and constructor.
*   name : a string
*   last_name : a string
*   assignments : an array of items (of object type), with each item being an Assignment object that belong to the student.
*
* 4. The Student class should have the following methods:
*   getFullName: Print Student name plus last name
*   getAssignmentsScore: Print list of the User Assignments with the format: "$StudentName score was $AssignmentGrade for: $AssignmentName"
*   getFinalCourseScore:
*        Print message with final score and passing status based on the Assignments Array. It can be a simple calculation such as: (( $Score1 + $Score2 ...) / NumberOfScores).
*        Example output: "Steve's final score was 8. Steve passed the course."
*
*/

class Student{
    constructor(name, last_name, assignments) {
        this.name = name;
        this.last_name = last_name;
        this.assignments = assignments;
      }
      getFullName(){
          console.log(`${this.name} ${this.last_name}`)
      }
      getAssignmentsScore(){
        for (const element of this.assignments) {
          console.log(`${this.name} score was ${element.score} for: ${element.title}`)
        }
      }
      getFinalCourseScore(){
        var numberOfScores = this.assignments.length;
        var totalScore = 0;
        for (const element of this.assignments) {
          totalScore += element.score;
        }
        totalScore = totalScore / numberOfScores
        if(totalScore >= 6){
          console.log(`${this.name}'s final score was ${totalScore}. Steve passed the course."`)
        }
        else{
          console.log(`${this.name}'s final score was ${totalScore}. Steve has failed the course."`)
        }
      }
}

class Assignment{
    constructor(title, score, description) {
        this.title = title;
        this.score = score;
        this.description = description;
        this.checkScoreInput();
      }

      checkScoreInput(){
        var score = this.score - Math.floor(this.score)
        // console.log(`Current number: ${this.score}, Decimal: ${score}`)
          if(!(this.score >= 0 && this.score <= 10)){
            throw 'Error! Score is invalid.';
          }
          else if(score >= 0.6){
            this.score = Math.ceil(this.score)
          }
          else if(score >= 0.5 && score < 0.6){
            this.score = this.score - score + 0.5
          }
          else if(score > 0 && score < 0.5){
            this.score = this.score - score;
          }
      }

      getQuickSummary(){
        console.log(`Title: ${this.title}\nDescription: ${this.description}`);
      }

      getAssignmentScore(){
          console.log(this.score);
      }
}