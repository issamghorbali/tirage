import { Injectable } from '@angular/core';
import { Boule } from '../services/boule';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
import { HttpClient, HttpHeaders } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})

export class BackendApiService {

  // Define API
  apiURL = 'http://localhost:8000/api';

  constructor(private httpClient: HttpClient) { }

  /*========================================
    CRUD Methods for consuming RESTful API
  =========================================*/

  // Http Options
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  // HttpClient API get() method => Fetch characters list

  getCharacters(): Observable<Boule> {
    return this.httpClient.get<Boule>(this.apiURL + '/', { headers: new HttpHeaders({
        'Accept':'application/json',
        'Content-Type': 'application/json'
      }) })
      .pipe(
        retry(1),
        catchError(this.processError)
      )
  }



  processError(err : Error) {
    let message = '';
    if(err instanceof ErrorEvent) {
      message = err.message;
    } else {
      message = `Error Code: Message: ${err.message}`;
    }
    console.log(message);
    return throwError(message);
  }




}
