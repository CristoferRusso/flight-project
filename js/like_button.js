'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return e(
      'div',
      { onClick: () => this.setState({ liked: true }) },
      'Test'
    );
  }
}

const domContainer = document.querySelector('#like_button_container');
const domContainer1 = document.querySelector('#like_button_container1');
const domContainer2 = document.querySelector('#like_button_container2');

const root = ReactDOM.createRoot(domContainer);
const root1 = ReactDOM.createRoot(domContainer1);
const root2 = ReactDOM.createRoot(domContainer2);


root.render(e(LikeButton));
root1.render(e(LikeButton));
root2.render(e(LikeButton));
