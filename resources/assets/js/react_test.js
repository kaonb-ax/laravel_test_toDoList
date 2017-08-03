import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';

class Hello extends React.Component{
  constructor(){
    super();
    this.state = {
        time: 0,
    }
  }
  increment(){
    console.log(this.state.time);
    this.setState({time : this.state.time + 1})
  };
  render(){
    return (<div>
            <h1>time : {this.state.time}</h1>
            <button onClick={this.increment.bind(this)}>+</button>
            <Timer />
            <User
                name="axel"
                nickname="kaonb"
                admin={true}
                time={this.state.time}
            />
            </div>);
  }
}
class Timer extends React.Component{
  render(){
    return <div className="timer"></div>;
  }
}
class User extends React.Component{
  formatC(){
    console.log('formatage en cours...');
  }
  render(){
    let isAdmin = '';
    if(this.props.admin){
      isAdmin =<button onClick={this.formatC}>format C:/</button>;
    }
    return <p>{this.props.name} - {this.props.nickname} - {isAdmin}</p>;
  }
}
ReactDOM.render(
  <Hello />,
  document.querySelector('#test_react1')
);
