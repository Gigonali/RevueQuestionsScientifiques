import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabEditeursComponent } from './tab-editeurs.component';

describe('TabEditeursComponent', () => {
  let component: TabEditeursComponent;
  let fixture: ComponentFixture<TabEditeursComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabEditeursComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabEditeursComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
