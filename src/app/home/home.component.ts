import { Component, OnInit } from '@angular/core';
import {BackendApiService} from "../services/backend-api.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  Boules: any = [];


  constructor(
    public restApi: BackendApiService
  ) { }

  ngOnInit() {
    this.loadBoules();
  }

  loadBoules() {
    return this.restApi.getCharacters().subscribe((data: {}) => {
      this.Boules = data;

    })
  }

}
