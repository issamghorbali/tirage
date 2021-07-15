import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {


  activetab = "";
  navbarOpen = false;
  constructor() { }

  ngOnInit(): void {
  }

  getActiveTab(tabname: string) {
    this.activetab = tabname;
  }


  toggleNavbar() {
    this.navbarOpen = !this.navbarOpen;
  }
}
