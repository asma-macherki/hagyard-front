import { TestBed } from '@angular/core/testing';

import { ElementPrescriptionService } from './element-prescription.service';

describe('ElementPrescriptionService', () => {
  let service: ElementPrescriptionService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ElementPrescriptionService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
