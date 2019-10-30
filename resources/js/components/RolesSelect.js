import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

const e = React.createElement;

class RolesSelect extends React.Component {
    constructor(props) {
        super(props);
        this.state = { roles: [] };

    }

    componentDidMount() {
        axios.get('users/roles')
            .then(res => {
                this.setState({roles: res.data});
            })
    }

    permissions(id) {
        axios.get('users/permissions-role?role_id='+id)
            .then(res => {
                this.setState({roles: res.data});
            })
    };

    render() {
        return (
            <div className="row">
                <div className="form-group form-type-combine col-12">
                    <label htmlFor="role">Rol</label>

                    <select id="role" className="form-control" name="permission" data-provide="selectpicker" onChange={(e) => this.permissions(e.target.value)}>
                        { this.state.roles.map(role => <option value={role.id} key={role.id}>{role.name}</option>)}
                    </select>
                </div>
            </div>
        );
    }
}

export default RolesSelect;
