import React from 'react';
import ReactDOM from 'react-dom';

class App extends React.Component{
    constructor(){
        super();
        this.state = {
          tasks :[
            {id:1, title: "faire la lessive"},
            {id:2, title: "manger"},
            {id:3, title: "faire prout"},
          ]
        };
    }
    addTask(){
        let tasks = this.state.tasks;
        tasks.push({id:+new Date(), title: "HEYY"});
        this.setState({tasks})
    };
    render(){
        return (
          <div>
            <h1>Mes taches</h1>
            <Todo tasks={this.state.tasks} />
            <button onClick={this.addTask.bind(this)}>ajouter tache</button>
          </div>
        );
    }
}
class Todo extends React.Component {
    render(){
        let task = this.props.tasks.map((task)=>{
          return <li key={task.id}>{task.title}</li>;
        });
        return(
            <ul>
              {task}
            </ul>
        )
    }
}
ReactDOM.render(
  <App />,
  document.querySelector('#test_react1')
);
