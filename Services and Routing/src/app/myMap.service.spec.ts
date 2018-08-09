import { TestBed, inject } from '@angular/core/testing';

import { MyMapService } from './my-map.service';

describe('MyMapService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [MyMapService]
    });
  });

  it('should be created', inject([MyMapService], (service: MyMapService) => {
    expect(service).toBeTruthy();
  }));
});
