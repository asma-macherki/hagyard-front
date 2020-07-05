import { TestBed } from '@angular/core/testing';

import {pharmacistService} from './pharmacist.service';

describe('UserService', () => {
  let service: pharmacistService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(pharmacistService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
