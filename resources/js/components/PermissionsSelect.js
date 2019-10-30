import React from 'react';
import ReactDOM from 'react-dom';

const e = React.createElement;

class PermissionsSelect extends React.Component {
    constructor(props) {
        super(props);
        this.state = { permissions: [] };
    }

    render() {
        return (
            <div className="row">
                <div className="form-group form-type-combine col-12">
                    <label htmlFor="permission">Permisos</label>

                    <select id="permission" className="form-control" name="permission" data-provide="selectpicker">
                        <option>{this.state.permissions}</option>
                    </select>
                </div>
            </div>
        );
    }
}

const domContainer = document.querySelector('#permissions');
ReactDOM.render(e(PermissionsSelect), domContainer);
